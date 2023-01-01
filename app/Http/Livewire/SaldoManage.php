<?php

namespace App\Http\Livewire;

use App\Models\Orphanage;
use App\Models\Transaction;
use Livewire\Component;

class SaldoManage extends Component
{
    public $tutorTransactionSearch;
    public $editedTutorTransactionIndex;
    public $tutorTransactionDropdownSort;
    public $tutorTransactions;
    public $status;
    public $showForm;
    public $showFormConfirmation;
    public $activeTab;
    public $tutorTransaction;
    public $keterangan;

    public function render()
    {
        $this->tutorTransactions = [];

        $this->tutorTransactions = Transaction::where('status', $this->tutorTransactionDropdownSort);

        $this->tutorTransactions->where(function ($search) {
            return $search->where('user_id', auth()->user()->id)
                        ->orwhere('to_user_id', auth()->user()->id);
        });
        $temp_transaction = clone $this->tutorTransactions;
        $listIdUserPanti = $temp_transaction->where('user_id', '<>', auth()->user()->id)
            ->pluck('user_id')->toArray();

        if (count($listIdUserPanti) > 0) {
            $ids_ordered = implode(',', $listIdUserPanti);
            $listNamePanti = Orphanage::whereIn('user_id', $listIdUserPanti)
                                            ->orderByRaw("FIELD(id, $ids_ordered)")
                                            ->pluck('name')->toArray();
            $name_ordered = "'".implode("','", $listNamePanti)."'";

            $this->tutorTransactions = $this->tutorTransactions->selectRaw("*, ELT(FIELD(user_id, $ids_ordered), $name_ordered) as from_panti");

            if ($this->activeTab == 'Penarikan Saldo') {
                $this->tutorTransactions = $this->tutorTransactions->where('user_id', auth()->user()->id);
            } else {
                $this->tutorTransactions = $this->tutorTransactions->where('to_user_id', auth()->user()->id);
            }

            if ($this->tutorTransactionSearch != null) {
                $this->tutorTransactions->where(function ($search) {
                    return $search->where('amount', 'like', '%'.$this->tutorTransactionSearch.'%')
                        ->orwhere('description', 'like', '%'.$this->tutorTransactionSearch.'%')
                        ->orwhere('created_at', 'like', '%'.$this->tutorTransactionSearch.'%')
                            ->orwhere('updated_at', 'like', '%'.$this->tutorTransactionSearch.'%');
                });

                $this->tutorTransactions = $this->tutorTransactions->orderBy('updated_at', 'DESC')
                ->get()->toArray();
            } else {
                $this->tutorTransactions = $this->tutorTransactions->orderBy('updated_at', 'DESC')
                ->get()->toArray();
            }
        } else {
            $this->tutorTransactions = [];
        }

        return view('livewire.saldo-manage');
    }

    public function mount()
    {
        $this->editedTutorTransactionIndex = null;
        $this->showForm = false;
        $this->showFormConfirmation = false;
        if (is_null($this->activeTab)) {
            $this->setTab('Penarikan Saldo');
        } else {
            $this->setTab($this->activeTab);
        }
    }

    public function openModalConfirmation($tutorTransactionIndex, $keterangan)
    {
        $this->tutorTransaction = $this->tutorTransactions[$tutorTransactionIndex] ?? null;
        $this->keterangan = $keterangan;
        $this->showFormConfirmation = true;
    }

    public function closeModalConfirmation()
    {
        $this->showFormConfirmation = false;
    }

    public function saveTutorTransaction()
    {
        if (!is_null($this->tutorTransaction)) {
            Transaction::find($this->tutorTransaction['id'])->update($this->tutorTransaction);
        }

        $this->showFormConfirmation = false;
        $this->editedTutorTransactionIndex = null;
        $this->setStatus();
    }

    public function cancelTutorTransaction()
    {
        if (!is_null($this->tutorTransaction)) {
            Transaction::find($this->tutorTransaction['id'])->update([
                'status' => 'canceled',
            ]);
        }

        $this->showFormConfirmation = false;
        $this->editedTutorTransactionIndex = null;
        $this->setStatus();
    }

    public function addData()
    {
        // $this->validate([
        //     'name' => 'required',
        //     'date_of_birth' => 'required',
        //     'gender' => 'required',
        // ], [
        //     'name.required' => 'Nama harus diisi.',
        //     'date_of_birth.required' => 'Tanggal lahir harus diisi.',
        //     'gender.required' => 'Jenis kelamin harus diisi.',
        // ]);

        // Orphan::create([
        //     'orphanage_id' => auth()->user()->orphanage->id,
        //     'name' => $this->name,
        //     'date_of_birth' => $this->date_of_birth,
        //     'gender' => $this->gender,
        //     'note' => $this->note,
        // ]);
        $this->showForm = false;
        // reset form fields
        $getActiveTab = $this->activeTab;

        $this->reset();

        $this->setTab($getActiveTab);

        // // show success message
        // session()->flash('message', 'Anak panti berhasil ditambahkan.');
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    public function editTutorTransaction($tutorTransactionIndex)
    {
        $this->editedTutorTransactionIndex = $tutorTransactionIndex;
    }

    public function setTutorTransactionDropdownSort($tutorTransactionDropdownSortNew)
    {
        $this->tutorTransactionDropdownSort = $tutorTransactionDropdownSortNew;
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;

        $this->setStatus();
    }

    public function setStatus()
    {
        $this->status = [];
        if ($this->activeTab == 'Penarikan Saldo') {
            $this->status = Transaction::where('user_id', auth()->user()->id)
                ->groupby('status')
                ->selectRaw('status')
                ->get()->toArray();
        } else {
            $this->status = Transaction::where('to_user_id', auth()->user()->id)
            ->groupby('status')
            ->selectRaw('status')
            ->get()->toArray();
        }

        $this->setTutorTransactionDropdownSort($this->status[0]['status']);
    }
}
