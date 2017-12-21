# media_service

## TASK
* Write code to deliver images in a resolution of 640x480px and 1280x720px. Find the edge cases such as responsive behavior and address them in your source code.
* Create an example page using bootstrap to implement your service.
* Address how to proceed from a technical point of view to scale the code to future requirements and what tasks you see to continue working on it to solve the initial situation. Address code style, quality assurance and testing in a document separately.
* Lead the technical process towards a first version (MVP). 

## CHALLENGE
* User’s device or Browser size should be detected, and the corresponding image should be loaded.
* Corresponding image: 
 * High resolution ( Laptop/Desktop) [ >=768px] . Image size: 1280x720px
 * Medium resolution ( Tablet, etc )[ Between 560px & 768px] . Image size:  640x480px
 * Small resolution (Mobile) [ <=560px] . Image size:  128x128px

## APPROACH TO THE PROBLEM
* Have build a basic blog consisting of title, body and cover image.
* User can post a new blog and read an existing one.
* While reading the blog, based on the browser size or device( mobile, tablet, or desktop/laptop) the image will adjust itself 
* detecting the device based on size and dimension.

## STACK USED
* Front end: HTML, CSS, Bootstrap, Javascript, JQuery
* Back end: PHP7
* Database: MySQL
* Server: Apache

## WORK FLOW

![Work flow](https://github.com/kanishk30/media_service/blob/master/Work%20flow.PNG "Work flow")

## ERROR HANDLING
* To support large files, the server's memeory size needs to be adjusted. This can be achieved by altering the values of the attributes `memory_limit` and `upload_max_filesize` in `php.ini` file. 
* Writing `ini_set('memory_limit', '-1');` can bypass memory limit, but it can crash server due to memory leak. Hence, NOT RECOMMENDED. 
* Unsupported image format: It only accepts jpeg, png or gif as input, else it would display an error message.
* Fields can’t be empty.

| INPUT FORMAT | TESTING | 
| ------------- |:-------------:| 
| jpeg of 5200x1900px | Uploaded| 
| jpeg of 1200x1900px | Uploaded | 
| png of 1920x1080px | Uploaded|
| png of 650x480px | Uploaded | 
| gif of 1000x750px | Uploaded 
| gif of 128x128px | Uploaded | 
| .pdf | Failed| 
| .doc | Failed | 
|.exe | Failed  | 

## FUTURE SCOPE
* Currently, as the page is loaded, Javascript decides the size of the browser, then a request is made at the backend server to load the image. 
* Load on the browser can be minimised as a request on the site is made, then in the header itself, name of the device can be sent ( mobile/tablet/PC) and hence image can be loaded from backend itself at that time. 
* The browser header sent when requesting a webpage. This header can be used to get the device details and hence send the image accordingly.
* Shifting from Core PHP to its frameworks, like Laravel, can greatly improve the performance and DX. 

## VIDEO DEMONSTRATION
Following video shows the live working of the service.

<a href="http://www.youtube.com/watch?feature=player_embedded&v=tK5Fp_IKCPk" target="_blank"><img src="http://img.youtube.com/vi/tK5Fp_IKCPk/0.jpg" 
alt="Working" width="240" height="180" border="10" /></a>

## HOW TO GET STARTED
```php
sudo apt-get update
sudo apt-get install apache2
sudo apt-get install mysql-server libapache2-mod-auth-mysql php5-mysql
sudo apt-get install php5 libapache2-mod-php5 php5-mcrypt
sudo service apache2 restart 
mysql -u <username> -p<PlainPassword> <databasename> < <database.sql>
sudo apt-get install git
sudo gedit /etc/apache2/sites-enables/000-sites.comfig
DocumentRoot /var/www/media_service
Close gedit
cd /var/www/
git clone https://github.com/kanishk30/media_service.git
sudo chmod  -R 777 media_service
sudo service apache2 restart 
```


