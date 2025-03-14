declare namespace Module.Fuel.Models {
export type FuelPriceData = {
id: number;
fuel_type: any;
price: string;
date: string;
};
}
declare namespace Module.User {
export type UserNameData = {
id: number;
name: string;
};
}
declare namespace Module.Vehicle.Web {
export type BrandData = {
id: number;
label: string;
};
export type StoreVehicleRequestData = {
vin: string;
licence_plate: string;
fuel_type: any;
type: any;
year: number;
mileage: number;
user_id: number;
brand_id: number;
};
export type VehicleData = {
id: number;
vin: string;
licence_plate: string;
fuelType: Record<any, string>;
type: Record<any, string>;
year: number;
mileage: number;
brand: string;
owner: string;
};
}
