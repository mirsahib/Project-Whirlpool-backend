

## House Rental Manegment System (HRMS) REST API

## Overview
The HRMS is an REST API to manage the tenant in my house.HRMS is build on laravel framework


## Api

### HTTP requests
All API requests are made by sending a secure HTTPS request using one of the following methods, depending on the action being taken:

* `POST` Create a resource
* `PUT` Update a resource
* `GET` Get a resource or list of resources
* `DELETE` Delete a resource

### Tenant 

| TYPE | URL | Parameter | Body | Response | Description
| --- | --- | ---| --- | --- | --- |
| `GET` | `/api/tenants` | **none** | **none** | return all tenants
| `GET` | `/api/tenants/{id}` | **id** - Identifier for current tenant  | **none** | return specific tenant
| `POST`  |  `/api/tenants/create` | **none** | <ul><li>name</li><li>nid</li><li>nid_img</li><li>phone</li><li>rent</li><li>reg_date</li></ul> | **none** | on successful response create new tenant with name,nid(national id),nid_img(national id photo),phone number,rent,date of renting the house
| `GET` | `/api/tenants/{id}/edit` | **id** - Identifier for current tenant | **none** | return specific tenant
| `PUT/PATCH` | `/api/tenants/{id}` | **id** - Identifier for current tenant | <ul><li>name</li><li>nid</li><li>nid_img</li><li>phone</li><li>rent</li><li>rent</li><li>reg_date</li></ul> | none
| `DELETE` | `api/tenants/{id}` | **id** - Identifier for current tenant | **none** | **none**

### Payment 
| TYPE | URL | Parameter | Body | Response | Description
| --- | --- | ---| --- | --- | --- |
| `GET` | `/api/payments` | **none** | **none** | return all paid and unpaid rent
| `POST` | `/api/payments/create` | **none** | <ul><li>month</li><li>year</li></ul> | **none** | 
| `PUT/PATCH` | `api/payments/update/{id}` | **id** - Identifier for current payment |  | |


## License

The Project is closed-source software.
