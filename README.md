
# BGU.NET

Our main goal is to create a system that combines from one hand a social network and on the other hand a courses management platform (such High-learn, Moodle and etc.)

## Open issues:
 
1. Fix Delete Social Network page.
2. Add Profile page. (Not implmemented yet)
3. Change theme of the ELGG network (Orange with camels).
4. Autmate installation of the DB. (For the network to run at the first time)
5. Create API for the side project of Lior.
6. Continue the development of the Invite Users process.
7. Affiliation of users to specific groups inside a network.
8. Fix CSV Exporter (Ofer), lines 17-24.

## Installation


 Email system configuration: (for the mail service to work in "localhost" environment)

  1.In PHP.INI :
      A. Uncomment this line : 'sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t" '.
      B. Comment this line : 'sendmail_path="C:\xampp\mailtodisk\mailtodisk.exe"'.

  2.In SendMail.INI:
      A. The line "smtp_server=" should be "smtp_server=smtp.gmail.com".
      B. The line "smtp_port=" should be "smtp_port=587".
      C. Enter credentials in the lines : "auth_username=" and "auth_password=".

  3.Credentials:
      Account:  "BGU.NET.Service@gmail.com".
      Password: "bguforever".

 Database Pre-Configure:
 
 Create database 'social_network' with two tables 'networks', 'users'.

## Usage

Create, manage and delete networks.

## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D

## License

Code and documentation copyright 2015 BGU.NET,  Code released under the ELGG license. Docs released under Creative Commons.
