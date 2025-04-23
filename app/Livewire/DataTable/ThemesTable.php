<?php

namespace APp\Livewire\DataTable;


use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Mekad\LaravelThemeCustomizer\Models\Theme;
use Mekad\LaravelThemeCustomizer\Repositories\ThemeRepository;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;


class ThemesTable extends DataTableComponent
{
    public $model = Theme::class;
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
        $this->setConfigurableAreas([
            'toolbar-right-start' => ['livewire.data-table.toolbar-btn' , [
                'wire' => "wire:click=add()",
                'lable' => "إضافة ثيم"
            ]],
        ]);
    }


    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()->hideIf(true),
            Column::make("key", "key")
                ->sortable(),
            BooleanColumn::make("Is Active", "is_active")
                ->sortable(),
            Column::make('Actions')
                ->label(fn($row) => view('livewire.data-table.themeactions', [
                    'row' => $row,
                    'isActive' => (bool) $row->is_active,
                    
                    'active' => "active($row->id)",

                    "delete" => "delete($row->id)"
                ]))->html()
        ];
    }


    public function active($id)
    {
        if ($this->themeRepository == null) {
            $this->themeRepository = new  ThemeRepository();
        }
        $this->themeRepository->setActiveGlobalTheme($id);
    }


    public function delete($id)
    {
        if (Theme::count() == 1) {
          
          
        } else {

            $theme = Theme::find($id);
            $theme->delete();
        }
    }

    public function viewItem($id)
    {
        redirect(route("admin.themes.show", ['id' => $id]));
    }

    public function add(){
        redirect()->route('admin.themes.create');
    }
}
