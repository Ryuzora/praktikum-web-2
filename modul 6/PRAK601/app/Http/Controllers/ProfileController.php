<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $profile = Profile::query()->firstOrFail();

        return view('index', [
            'name' => $profile->name,
            'nim' => $profile->nim,
        ]);
    }

    public function profile(): View
    {
        $dbProfile = Profile::query()->firstOrFail();
        $profile = ['name' => $dbProfile->name, 'nim' => $dbProfile->nim];
        $activities = $this->getActivities();

        return view('profil', [
            'profile' => $profile,
            'activities' => $activities,
        ]);
    }

    public function activity(string $slug): View
    {
        $dbProfile = Profile::query()->firstOrFail();
        $profile = ['name' => $dbProfile->name, 'nim' => $dbProfile->nim];
        $activities = $this->getActivities();
        $activity = null;

        foreach ($activities as $item) {
            if ($item['slug'] === $slug) {
                $activity = $item;
                break;
            }
        }

        abort_if($activity === null, 404);

        return view('activity-detail', [
            'profile' => $profile,
            'activity' => $activity,
        ]);
    }

    private function getActivities(): array
    {
        return [
            [
                'title' => 'After foto pengurus HMTI',
                'slug' => 'after-foto-pengurus-hmti',
                'summary' => 'ini abah bahari befoto lwn kakawanan nak ae',
                'date' => '12 Maret',
                'year' => '2025',
                'image' => 'images/activities/act1.jpeg',
                'highlights' => [
                    'alhamdulillah',
                    '#hmtikeren',
                    '#hmtimaju',
                ],
            ],
            [
                'title' => 'mubes',
                'slug' => 'mubes',
                'summary' => 'abah bahari main sidang sidangan jua nak ae, rami banar mendangari rocky gerung vs hotman paris',
                'date' => '24 Desember',
                'year' => '2025',
                'image' => 'images/activities/mubes.jpeg',
                'highlights' => [
                    'lucu',
                    'menyenangkan',
                    'tertawa #mubeslagidong',
                ],
            ],
            [
                'title' => 'uas imk dengan sir fahmi',
                'slug' => 'priotify',
                'summary' => 'abah bahari belajar mendesain uyuh banar nak ae, tapi lihat nang nyaman abah jua',
                'date' => '10 Desember',
                'year' => '2025',
                'image' => 'images/activities/priotify.jpeg',
                'highlights' => [
                    'menantang',
                    '#ampunpakfahmi',
                    '#bersamanervers',
                ],
            ],
            [
                'title' => 'lkmm',
                'slug' => 'lkmm',
                'summary' => 'nah ini yg paling abah ketuju nak ae, lkmm lwn kawanan rami banar jaman anum bahari',
                'date' => '5 Mei',
                'year' => '2025',
                'image' => 'images/activities/lkmm.jpeg',
                'highlights' => [
                    'ini sih seru banget',
                    'kami pernah di situ di posisimu',
                    'kamu pasti bisa',
                ],
            ],
        ];
    }
}
