<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $name = 'Muhammad Azma Al Faqih';
        $nim = '2410817110008';
        $initials = $this->getInitials($name);

        return view('index', [
            'name' => $name,
            'nim' => $nim,
            'initials' => $initials,
        ]);
    }

    private function getInitials(string $name): string
    {
        $parts = array_filter(explode(' ', $name));
        $letters = array_map(static fn (string $part) => strtoupper(substr($part, 0, 1)), $parts);

        return implode('', $letters);
    }
}

