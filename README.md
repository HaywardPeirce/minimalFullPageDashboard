# minimalFullPageDashboard
A minimal dashboard page for FullPageOS

This dashboard page was inspired by [FullPageDashboard](https://github.com/amitdar/FullPageDashboard). The idea was to build a minimalist page that simply looped through a list of configured sites at a configured rate. These sites, and this delay, are both configurable from config files, and there is no web interface for selecting sites nor for starting/stopping the looping.

1. Clone the repo into, for example, the pi user's home directory `~/`
2. Make copes of the `config.ini.example` and `sites.txt.example` files and remove the `.example` from the new files' names
3. Edit each of the new files to configure how long you would like to stay on each site (`delay` in the `config.ini` file) and which sites you would like to loop through (in `sites.txt`)
> Note: Make sure to remove any whitespace from before or after the URLs in the `sites.txt` file as this may cause the sites to laod incorrectly
4. Create a simlink to the `minimalFullPageDashboard` folder in /var/www/html/ `ln -s ~/minimalFullPageDashboard/ /var/www/html/minimalFullPageDashboard`
5. Update the configured FullPageOS dashboard page `sudo nano /boot/fullpageos.txt` to instead use `http://localhost/minimalFullPageDashboard/index.php` (instead of `http://localhost/FullPageDashboard/index.php`)
6. reboot your pi.

The pi should now boot up and start looping through your configured list of files at your configured time interval