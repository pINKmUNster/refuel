declare namespace Module.User {
export type UserNameData = {
id: number;
name: string;
};
}
declare namespace Module.Vehicle {
export type BrandData = {
id: number;
label: string;
};
export type VehicleData = {
id: number;
vin: string;
licence_plate: string;
fuelType: string;
type: string;
year: number;
mileage: number;
brand: string;
owner: string;
};
}
declare namespace Module.Vehicle.Web {
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
}
