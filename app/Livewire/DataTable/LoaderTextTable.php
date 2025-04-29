<?php

namespace APp\Livewire\DataTable;

use App\Models\Loader\LoaderText;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Mekad\LaravelThemeCustomizer\Repositories\ThemeRepository;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;


class LoaderTextTable extends DataTableComponent
{
    public $model = LoaderText::class;
    public $themeRepository;


    public function configure(): void
    {
        $this->setPrimaryKey("id");
        $this->setSearchStatus(false);
        $this->setTdAttributes(function (Column $column, $row, $rowIndex, $rows) {
            if ($column->getTitle() !== 'Actions') {
                return [
                    'wire:click' => "viewItem({$row->id})",
                    'class' => 'cursor-pointer',
                ];
            }
            return [];
        });
        // $this->setActionsInToolbar();
        // $this->setConfigurableAreas([
        //     'toolbar-right-start' => ['livewire.data-table.toolbar-btn' , [
        //         'wire' => "wire:click=add()",
        //         'lable' => "إضافة ثيم"
        //     ]],
        // ]);
    }


    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()->hideIf(true),
            Column::make("text", "text")
                ->sortable(),
            BooleanColumn::make("Is Active", "is_active")
                ->sortable(),
            // Column::make("order","display_order")->sortable(),
            Column::make('Actions')
                ->label(fn($row) => view('livewire.data-table.text-loader-actions', [
                    'row' => $row,
                    'isActive' => (bool) $row->is_active,
                    'unactive' => "unactive($row->id)",
                    'active' => "active($row->id)",

                    "delete" => "delete($row->id)"
                ]))->html()
        ];
    }


    public function active($id)
    {
       $loader = LoaderText::find($id);
       $loader->update([
        'is_active' => 1 
       ]);
    }


    public function unactive($id) {
        $loader = LoaderText::find($id);
        $loader->update([
         'is_active' => 0 
        ]);
    }
    public function delete($id){
        $textLaoder = LoaderText::find($id);
        $textLaoder->delete();
    }


    public function viewItem($id)
    {
        redirect(route("admin.loader.text.show", ['id' => $id]));
    }

    // public function add()
    // {
    //     redirect()->route('admin.themes.create');
    // }
}
