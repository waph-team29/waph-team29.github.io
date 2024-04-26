# WAPH-Web Application Programming and Hacking

## Instructor: Dr. Phu Phung

# Team Project: "miniFacebook" - a simplified yet secure social networking web application


# Team members

1. Jahnavi Meesala , meesalji@mail.uc.edu
2. Sai Prathyusha Kudaka , kudakasa@mail.uc.edu
3. Tassnim Kousar Shaik , shaiktr@mail.uc.edu

# Project Management Information

Source code repository (private access): https://github.com/waph-team29/waph-teamproject

Project homepage (public): https://github.com/waph-team29/waph-team29.github.io

## Revision History

| Date       |   Version     |                    Description                                                                               |
|------------|:-------------:|-------------------------------------------------------------------------------------------------------------:|
| 04/25/2024 |  0.4          | Developed a secure social networking web application, "miniFacebook," implementing full-stack technologies   | 


# Overview

Our aim for this assignment is to develop "miniFacebook," a safe social networking web application. Secure programming techniques and full-stack development are our main areas of interest. By breaking the project up into sprints, we make sure that every team member actively participates, as shown by the code and documentation. In addition to superuser rights for user management, our functional needs include user registration, login, profile management, post authoring, comment engagement, and real-time chat. Tight security controls are put in place, including the deployment of HTTPS, hashed passwords, prepared SQL statements, and input validation at every tier. It is crucial to have role-based access control and to defend against CSRF and session hijacking. We incorporate a free and open-source CSS template to improve the application's aesthetic appeal. Our report, video demo, and project repository provide thorough documentation for assessment. 

## User Interface

# Implementation

We convert the requirements and design into the functional elements of the "miniFacebook" web application during the implementation process. Starting with the architecture of the database and user authentication systems, we make sure that strong security features like HTTPS deployment, hashed passwords, and prepared SQL statements are in place. Every component in the application—from user registration to post authoring and comment interaction—is painstakingly designed, tested, and integrated. In order to distinguish between normal users and superusers and guarantee that the right permissions and privileges are granted, role-based access control is used. The integration of real-time chat capabilities enables users to communicate instantly with one another. We follow agile development methodologies during the implementation phase, holding frequent meetings and updates to monitor developments and resolve any issues. The application is refined through iteration and continuous testing to make sure it satisfies both functional requirements and security standards.

# Security analysis

We analyze the network, application, and data security of the "miniFacebook" application. We use prepared SQL statements to stop SQL injection attacks, hash passwords for storage integrity, and implement HTTPS for secure data transport. Enhancing data security and integrity is the goal of input validation at all tiers. Strong techniques for CSRF prevention and session authentication guard against illegal activity and session hijacking. Privileges are limited by role-based access control, guaranteeing that only authorized users can access sensitive functionality. This all-encompassing strategy protects user data, strengthens the application against possible attacks, and guarantees a safe user experience.

# Demo (screenshots)

1. The application is deployed on HTTP, below screenshot shows the picture of valid certificate.
![1](images/http.png)

Below screenshot shows that all the passwords are hashed and stored securely.
![2](images/hash.jpeg)

Here this screenshot shows that we have used a non MYSQL root user.
![3](images/mysql.jpeg)

Below screenshots shows that we have used the prepared statements, in order to safeguard the SQL code from the attacks and threats.
![4](images/prepare1.jpeg)
![5](images/prepare2.jpeg)

Added extensive input validation to the HTML layers to protect against injection attacks and guarantee data integrity. This strengthened the application's security posture and prevented unauthorized users from accessing sensitive data at any point in the software stack.
![6](images/htmlv.jpeg)

Added extensive input validation to the PHP layers to protect against injection attacks and guarantee data integrity. This strengthened the application's security posture and prevented unauthorized users from accessing sensitive data at any point in the software stack.
![7](images/phpv.jpeg)

Added extensive input validation to the SQL layers to protect against injection attacks and guarantee data integrity. This strengthened the application's security posture and prevented unauthorized users from accessing sensitive data at any point in the software stack.
![8](images/sqlv.jpeg)
![9](images/sqlv2.jpeg)

Below screenshots showing input validation outputs
![10](images/inputvalid.jpeg)
![11](images/inputvalid2.jpeg)

XSS vulnerabilities were addressed by applying strict HTML output sanitization techniques. User-generated content was carefully filtered to remove potentially dangerous scripts and reduce the possibility of cross-site scripting attacks, strengthening the front end of the application's defense against malicious exploitation.
![12](images/htmlsanitize.jpeg)

Built a strong role-based access control system, carefully defining superuser and registered user permissions and privileges, and carefully monitoring user roles to control access to key features and functionalities according to predetermined authorization levels. This allowed for fine-grained control over user access rights and strengthened the application's security posture against unwanted access attempts.
![13](images/rolebase11.jpeg)
![14](images/rolebase12.jpeg)

Strict access controls were implemented to stop ordinary users from editing or updating posts written by other users. User permissions were carefully verified to limit editing rights to the original content creators, protecting the ownership rights of user-generated content and reducing the possibility of sensitive data being altered without authorization.
![25](images/xyz.jpeg)

below screenshot showing that the superuser information is stored in the database.
![15](images/rolebase22.jpeg)

The below screenshot shoes the dashboard information of the registered super users. Here you can see in the below screenshot that the top user has been disabled.
![20](images/rolebase23(1).jpeg)

The below screenshot shoes the dashboard information of the registered super users. Here you can see in the below screenshot that the top user has been enabled.
![19](images/rolebase23(2).jpeg)

The below screenshot shows the database, where superuser information is stored.
![18](images/rolebase24.jpeg)



The application's defenses against unauthorized access attempts and the confidentiality and integrity of user interactions within the system were strengthened by the implementation of strong session authentication mechanisms. Cryptographic protocols and secure session management techniques were used to verify user identities and prevent session hijacking attacks.
![22](images/hijack.jpeg)
![16](images/sessauth.jpeg)

Implemented stringent validation checks and token-based authentication protocols to confirm the authenticity of user requests and prevent unauthorized actions on behalf of authenticated users. This strengthened the application's resilience against malicious exploitation of user sessions and protected against unauthorized manipulation of sensitive data. Comprehensive CSRF protection mechanisms were deployed to reduce the risk of cross-site request forgery attacks.
![17](images/csrf.jpeg)

Below screenshot showing the integrated open-source front end CSS template that is bootstrap.
![23](images/boot.jpeg)

Below screenshot is our team project webiste which is "mini facebook" developed by team-29
![24](images/website.jpeg)


## Scrum process

### Sprint 0

Duration: 20/03/2024-23/03/2024

#### Overall Team Completed Tasks:

1. GitHub Organization Setup:
1. Created an organization on GitHub named "waph-team29".
2. Added other team members and "phung-waph" as organization members.
3. Repository Setup: Created a private repository for the project named "waph-teamproject". Created a public repository to host the team project website named "waph-team29.github.io". Checked out the "waph-teamproject" repository and added a README.md template. Checked out the "waph-team29.github.io" repository and added an index.html template. Checked out both repositories and added/revised code, README.md, and index.html files accordingly. Committed and pushed the changes to both repositories.
   
#### SSL Key/Certificate Setup:
1. Created a team SSL key and certificate.
2. Set up HTTPS and a team local domain name for secure communication.
   
#### Database Design and Setup:
1. Designed and set up the team database according to project requirements.
2. Code Skeleton and Testing: Copied the code skeleton from Lab 3 to the "waph-teamproject" repository.
3. Revised the code based on Lab 4 requirements and conducted initial testing.
4. Committed the code along with README.md and index.html files for Sprint 0 submission.
5. Sprint 0 focused on setting up the project infrastructure, including repositories, SSL configuration, and database design. Team collaboration was crucial in ensuring smooth setup and configuration of GitHub repositories and SSL certificates. Initial code setup and testing laid the foundation for upcoming development sprints. Sprint 0 served as a preparatory phase, setting the stage for efficient development in subsequent sprints.

#### Contributions:

Member 1, 4 commits, 2 hours, contributed in form.php
Member 2, 2 commits, 1 hours, contributed in index.html
Member 3, 4 commits, 1 hours, contributed in index.php

### Sprint 1

Duration: 03/25/2024-03/31/2024

#### Completed Tasks:

1. User Registration and login
2. change password
3. edit profile
4. view posts
   
#### Contributions:

Member 1, 4 commits, 1 hours, contributed in addnewuser.php, changepassword.php, changepasswordform.php
Member 2, 6 commits, 1 hours, contributed in database.php, registrationform.php, session_auth.php
Member 3, 1 commits, 1 hours, contributed in form.php, logout.php

### Sprint 2

Duration: 03/31/2024-04/16/2024

#### Completed Tasks: 

The tasks that are completed are:
1. A new post can be added by the users that are already logged-in.
2. The users who has already logged-in can edit the posts that they have created that is they can either update or delete. 
3. Other users cannot edit the posts that are created by some other users. 

#### Contributions: 

1. Member 1, 4 commits, 3 hours, contributed in viewposts.php, comments.php
2. Member 2, 7 commits, 1 hours, contributed in index.php, delete.php
3. Member 3, 6 commits, 1 hours, contributed in database.php

### Sprint 3 (final project)

Duration: 04/17/2024-04/25/2024

#### Completed Tasks: 

The tasks that are completed are:
1. Added administrative control over user administration by enabling superusers to disable and enable user accounts.
2. Strengthened security protocols and stopped unwanted access by making sure that disabled accounts are unable to log in. 
3. Enhanced user engagement and interaction inside the program by enabling smooth communication between users through the installation of a real-time chat function.. 

#### Contributions: 

1. Member 1, 20 commits, 4 hours, contributed in addnewuser.php, admin-panel.php, changepassword.php, changepasswordform.php
2. Member 2, 19 commits, 4 hours, contributed in createPost.php, dashboard.php, database.php, delete.php, disable-user.php
3. Member 3, 15 commits, 3 hours, contributed in edit.php, enable-user.php, viewposts.php, comments.php
# Appendix
