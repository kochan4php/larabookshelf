<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(
    public $type = 'button',
    public $color = 'primary',
    public $fullWidth = false,
    public $title = 'Title'
  ) {
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.button');
  }
}
