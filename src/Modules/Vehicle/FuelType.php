<?php

namespace Module\Vehicle;

enum FuelType: string
{
    case ELECTRIC = 'electric';
    case GASOLINE = 'gasoline';
    case DIESEL = 'diesel';
}
