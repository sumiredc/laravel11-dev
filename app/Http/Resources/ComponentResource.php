<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Component;

final class ComponentResource extends JsonResource
{
    /**
     * @var string
     */
    public static $wrap = 'component';

    /**
     * @param Component $component
     */
    public function __construct(Component $component)
    {
        parent::__construct([
            'html' => Blade::renderComponent($component),
        ]);
    }
}
