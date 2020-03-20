# TruckHub Backend :truck:

[![codebeat badge](https://codebeat.co/badges/7db3ee88-7c8a-43ed-bc45-1cd85da940a9)](https://codebeat.co/projects/github-com-jamesnyakush-truckhub-server-master)  [![Maintainability](https://api.codeclimate.com/v1/badges/4e1e8537f40353706e46/maintainability)](https://codeclimate.com/github/jamesnyakush/truckhub-server/maintainability)  [![Test Coverage](https://api.codeclimate.com/v1/badges/4e1e8537f40353706e46/test_coverage)](https://codeclimate.com/github/jamesnyakush/truckhub-server/test_coverage)


Truckhub Backend is a fully featured Api.

## Api Endpoints
| Endpoint | Method | Status |
| :------: |:------:|:------:|
| /api/v1/auth/login | Post | Used to authanticate a user |
| /api/v1/auth/signup | Post | Used to register a new user |
| /api/v1/auth/logout | Get | Used to logout a user|
| /api/payment/register-url | Get | Used to register Urls Mpesa |
| /api/payment/validate | Any | Used to validate Mpesa transaction|
| /api/payment/confirm | Any | Used to confirm Mpesa transaction |
| /api/v1/bookings | Get | Used to display a list of bookings |
| /api/v1/bookings/{booking} | Get | Used to display a booking with id |
| /api/v1/bookings | Post | Used to Add new Booking |
| /api/v1/bookings/{booking} | Put | Used to update a booking |
| /api/v1/bookings/{id} | Delete | Used to Delete  a booking by id|
| /api/v1/trucks | Get | Used to get a list of trucks |
| /api/v1/trucks/{id} | Get | Used to Get a truck by id |
| /api/v1/trucks | Post | Used to add new truck |
| /api/v1/trucks/{id} | Put | Used to Updated a truck by id |
| /api/v1/trucks/{id} | Delete | Used to delete a truck by id |



## Tools used

* Used [SmoDav](https://github.com/SmoDav/mpesa) Mpesa Library to integrate with daraja.
* Used [vue](https://vuejs.org/) For Frontend Development.
* Used [AfricasTalking](https://github.com/AfricasTalkingLtd/africastalking-php) to send sms and notification.
* Used [passport](https://laravel.com/docs/5.8/passport) to generate OAuth tokens.
* Used [kreait](https://github.com/kreait/firebase-php) for Push Notification.


## Inspiration


## Contributors

Made with [contributors-img](https://contributors-img.web.app).

<a href="https://github.com/jamesnyakush/truckhub-server/graphs/contributors">
  <img src="https://contributors-img.web.app/image?repo=jamesnyakush/truckhub-server" />
</a>




