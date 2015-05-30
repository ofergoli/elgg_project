
# BGU.NET

Our main goal is to create a system that combines from one hand a social network and on the other hand a courses management platform (such High-learn, Moodle and etc.)

## Open issues:
 

1. Add picutre to Profile page (picture at '''img/User-icon.png'''.
2. Change theme of the ELGG network (Orange with camels) - Ofer
3. Autmate installation of the DB. (For the network to run at the first time) - Ofer
4. Create API for the side project of Lior.
5. Continue the development of the Invite Users process - Ofer
6. Affiliation of users to specific groups inside a network.


## Installation

 <h4>Email system configuration:  </h4>

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

 <h4>Database Pre-Configure: </h4>
 
 Create database 'social_network' with two tables 'networks', 'users'.
 Use the following SQL statements to configure database:
 ```
 CREATE TABLE 'users' (
  username varchar(200) NOT NULL,
  password varchar(200) NOT NULL,
  email varchar(200) NOT NULL,
  PRIMARY KEY ('username')
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1


CREATE TABLE 'networks' (
  'social_key' varchar(255) NOT NULL DEFAULT '',
  'username' varchar(255) DEFAULT NULL,
  'network_name' varchar(255) NOT NULL,
  'sn_link' varchar(255) NOT NULL,
  PRIMARY KEY ('social_key'),
  KEY 'username' ('username'),
  CONSTRAINT 'networks_ibfk_1' FOREIGN KEY ('username') REFERENCES 'users' ('username')
) ENGINE=InnoDB DEFAULT CHARSET=latin1
```

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
