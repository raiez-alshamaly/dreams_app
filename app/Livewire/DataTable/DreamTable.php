<?php

namespace App\Livewire\DataTable;

use App\Enums\DreamStatusEnum;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use App\Models\Dream;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberRangeFilter;

class DreamTable extends DataTableComponent
{
    protected $model = Dream::class;
     
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('created_at', 'desc');

        $this->setTdAttributes(function (Column $column, $row, $rowIndex, $rows) {
            if ($column->getTitle() !== 'Actions') {
                return [
                    'wire:click' => "viewItem({$row->id})",
                    'class' => 'cursor-pointer',
                ];
            }
            return [];
        });
        // $this->setFilterLayoutSlideDown();
        $this->setConfigurableAreas([
            'toolbar-right-end' => 'livewire.data-table.toolbar',
        ]);
       
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Full Name", "full_name")
                ->sortable()
                ->searchable(),
            Column::make("Description", "description")
                ->sortable()
                ->searchable()
                ->format(fn($value) => Str::limit($value, 50, '...')),
            Column::make("Status", "status")
                ->sortable()
                ->format(fn($value) => view('livewire.data-table.status', ['status' => $value])),
            Column::make('amount', 'amount')->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            Column::make("Deleted at", "deleted_at")
                ->sortable()
                ->format(function ($value) {
                    return $value ? $value->format('Y-m-d H:i:s') : '-';
                }),
            Column::make('Actions')
                ->label(fn($row) => view('livewire.data-table.actions', [
                    'row' => $row,
                    'deleteAction' => "deleteItem({$row->id})",
                    'acceptAction' => "acceptItem({$row->id})",
                    'restoreAction' => "restoreItem({$row->id})",
                ]))
                ->html(),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Trashed')
                ->options([
                    'none' => 'None',
                    'with' => 'With Trashed',
                    'only' => 'Only Trashed',
                ])
                ->filter(fn(Builder $builder, string $value) => $value === 'with' ? $builder->withTrashed() : ($value === 'only' ? $builder->onlyTrashed() : null)),
                NumberRangeFilter::make('Amount')
                ->options([
                    'min' => 0,
                    'max' => 0
                ])
                ->config([
                    'minRange' => Dream::query()->min('amount'),
                    'maxRange' => Dream::query()->max('amount'),
                ])
                ->filter(function (Builder $builder, array $values) {
                    $builder->where('amount', '>=', intval($values['min']))
                            ->where('amount', '<=', intval($values['max']));
                }),
            SelectFilter::make('Status')
                ->options([
                    '' => 'All',
                    DreamStatusEnum::PENDING->value => 'Pending',
                    DreamStatusEnum::APPROVE->value => 'Approved',
                ])
                ->filter(fn(Builder $builder, string $value) => $value ? $builder->where('status', $value) : null),
                DateRangeFilter::make('created_at'),
        ];
    }

    public function builder(): Builder
    {
        return Dream::query();
    }

    #[On('deleteItem')]
    public function deleteItem($id): void
    {
        $dream = Dream::withTrashed()->findOrFail($id);
        $dream->delete();
    }

    #[On('acceptItem')]
    public function acceptItem($id): void
    {
        $dream = Dream::findOrFail($id);
        $dream->update(['status' => DreamStatusEnum::APPROVE->value]);
    }

    #[On('restoreItem')]
    public function restoreItem($id): void
    {
        $dream = Dream::withTrashed()->findOrFail($id);
        $dream->restore();
    }

    #[On('viewItem')]
    public function viewItem($id): void
    {
        redirect()->route('dreams.show', $id);
    }

    public function randomSelect(): void
    {
        $query = $this->getBuilder();
        $randomDream = $query->inRandomOrder()->first();
        if ($randomDream) {
            redirect()->route('dreams.show', $randomDream->id);
        } else {
            session()->flash('message', 'No items found after filtering.');
        }
    }
}