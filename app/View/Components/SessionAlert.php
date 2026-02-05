<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SessionAlert extends Component
{
    public array $messages = [];
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $types = ['success', 'info', 'warning', 'error'];

        foreach ($types as $type) {
            if (session()->has($type)) {
                $this->messages[] = [
                    'type' => $type === 'error' ? 'danger' : $type,
                    'message' => session($type),
                ];
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.session-alert');
    }
}
