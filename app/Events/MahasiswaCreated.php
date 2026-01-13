<?php

namespace App\Events;

use App\Models\Mahasiswa;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MahasiswaCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $mahasiswa;

    public function __construct(Mahasiswa $mahasiswa)
    {
        $this->mahasiswa = $mahasiswa;
    }

    public function broadcastOn()
    {
        return new Channel('mahasiswa');
    }

    public function broadcastAs()
    {
        return 'MahasiswaCreated';
    }

    public function broadcastWith()
    {
        return [
            'mahasiswa' => [
                'id' => $this->mahasiswa->id,
                'nim' => $this->mahasiswa->nim,
                'nama' => $this->mahasiswa->nama,
                'angkatan' => $this->mahasiswa->angkatan,
                'prodi' => $this->mahasiswa->prodi ? [
                    'nama_prodi' => $this->mahasiswa->prodi->nama_prodi
                ] : null
            ]
        ];
    }
}