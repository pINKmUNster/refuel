<?php

namespace Module\Car;

enum FuelType: string
{
    case ELECTRIC = 'electric';
    case GASOLINE = 'gasoline';
    case DIESEL = 'diesel';
}
