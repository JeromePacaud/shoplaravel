<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public string $type;
    public string $message;

    protected array $allowedTypes = [
        'success',
        'info',
        'warning',
        'danger',
        'error',
    ];

    /**
     * Create a new component instance.
     */
    public function __construct(string $type = 'info', string $message = '')
    {
        if ($type === 'error') {
            $type = 'danger';
        }

        $this->type = in_array($type, $this->allowedTypes, true)
            ? $type
            : 'info';

        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
