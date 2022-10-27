<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{
  /**
   * The Input Type
   *
   * @var string
   */
  public $type;

  /**
   * The Input Label
   *
   * @var string
   */
  public $label;

  /**
   * The Input Name
   *
   * @var string
   */
  public $name;

  /**
   * The Input Placeholder
   *
   * @var string
   */
  public $placeholder;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($type = 'text', $label = 'Label', $name = 'nama', $placeholder = 'Placeholder')
  {
    $this->type = $type;
    $this->label = $label;
    $this->name = $name;
    $this->placeholder = $placeholder;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('components.input');
  }
}
