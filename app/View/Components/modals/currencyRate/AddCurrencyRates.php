<?php

namespace App\View\Components\modals\currencyRate;

use Illuminate\View\Component;

class AddCurrencyRates extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.currency-rate.add-currency-rates');
    }
}
