<?php

namespace App\View\Components\Layout;

use App\Helpers\Utilities;
use Awcodes\Curator\Models\Media;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class HeaderImage extends Component
{
    public function __construct(
        public ?Model $model=null,
        public ?string $class=null,
        public ?string $title = null,
        public ?string $image = null,
        public ?string $last_title="",
        public array $breadcrumbs=[],
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->image = asset("/images/bg/titlebar-bgdark.png");
        if (!$this->model?->header_image){
            $current_path = '/' . trim(Utilities::str_replace_limit(app()->getLocale(), '', request()->path(), 1), '/');
            $this->model = \App\Models\HeaderImage\HeaderImage::wherePath($current_path)->first();
            $this->image = Media::find($this->model?->image_id)?->url ?? $this->image;
            $this->title = $this->model?->title ?? $this->title;
        }elseif ($this->model){
            $this->image = Media::find($this->model->header_image)?->url ?? $this->image;
            $this->title = $this->model->header_title ?? $this->title;
        }

        return view('components.layout.header-image');
    }
}
