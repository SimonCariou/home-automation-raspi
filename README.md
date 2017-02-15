# Home Automation Raspi - microcomputer

*Home automation system based on raspberry pi.*

## Description

Basic website hosted on the raspberry pi. I am able to control a camera and the GPIO pins from the web. Plus the website is accessible from the outside by port forwarding. Initially there is an authentication process based on htaccess/htpassword since it is possible to take pictures of my house which is a bit private.

## What it does

I am able to:
- [x] Login to the website (every member of my family has an account with id and passwd)
- [x] Take pictures by executing commands on the raspberry via PHP
- [x] Turn on lights/coffee maker/everything that is plugged in the extension cord, by attaching an electrical 12V relay to the raspberry that I control with the GPIO pins. I plug an extension cord to an electrical socket and put the electrical relay in the middle of the circuit so I am able to cut and open it remotely.
- [ ] Work in progress: set up a NAS and access files (movies, pictures...) that are located on the raspberry pi remotely. And set up my own streaming system.
