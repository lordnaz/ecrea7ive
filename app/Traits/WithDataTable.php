<?php

namespace App\Traits;


trait WithDataTable {
    
    public function get_pagination_data ()
    {
        switch ($this->name) {
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('user.new'),
                            'create_new_text' => 'Buat User Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            
            case 'migration':
                $migrations = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.migration',
                    "migrations" => $migrations,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('user.new'),
                            'create_new_text' => 'Buat User Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

                case 'pendingMeeting':
                    $pendingMeetings = $this->model::search($this->search)
                        ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                        ->paginate($this->perPage);
    
                    return [
                        "view" => 'livewire.table.pendingMeeting',
                        "pendingMeetings" => $pendingMeetings,
                        "data" => array_to_object([

                        ])
                    ];
                    break;

                case 'leaveApplication':
                    $leaveApplications = $this->model::search($this->search)
                        ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                        ->paginate($this->perPage);
        
                    return [
                         "view" => 'livewire.table.leaveApplication',
                            "leaveApplications" => $leaveApplications,
                            "data" => array_to_object([
                                'href' => [
                                    
                                ]
                            ])
                        ];
                    break;
                    case 'inventory':
                        $inventorys = $this->model::search($this->search)
                            ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                            ->paginate($this->perPage);
            
                        return [
                             "view" => 'livewire.table.inventory',
                                "inventorys" => $inventorys,
                                "data" => array_to_object([
                                    'href' => [

                                    ]
                                ])
                            ];
                        break;
                        case 'requestMeeting':
                            $requestMeetings = $this->model::search($this->search)
                                ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                                ->paginate($this->perPage);
                
                            return [
                                 "view" => 'livewire.table.requestMeeting',
                                    "requestMeetings" => $requestMeetings,
                                    "data" => array_to_object([
                                        'href' => [
    
                                        ]
                                    ])
                                ];
                            break;

            default:
                # code...
                break;
        }
    }
}