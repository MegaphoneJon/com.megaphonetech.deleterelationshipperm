# Delete Relationship Permission

#### com.megaphonetech.deleterelationshipperm

## Overview

This extension restricts deletions of relationship between contacts for users not having Delete relationship permission.

This extension has been developed and is being maintained by [Megaphone Technology Consulting](https://www.megaphonetech.com/).

## Requirements

- PHP v7.0+
- CiviCRM 4.6+


## Installation (Web UI)

1. If you have not already done so, setup *Extensions Directory*
   1. Go to **Administer » System Settings » Directories**
   1. Set an appropriate value for *CiviCRM Extensions Directory*. For example, for Drupal, `[civicrm.files]/ext/`
   1. In a different window, ensure the directory exists and is readable by your web server process.
   1. Click **Save**.
1. If you have not already done so, setup *Extensions Resources URL*
   1. Go to **Administer » System Settings » Resource URLs**
   1. Beside Extension Resource URL, enter an appropriate values such as `[civicrm.files]/ext/`
   1. Click **Save**.
1. Install Delete Relationship Permission extension
   1. Go to **Administer » System Settings » Extensions**.
   1. Click on **Add New tab**.
   1. If Delete Relationship Permission is not in the list of extensions, manually download it and unzip it into the extensions direction setup above, then return to this page.
      1. Beside *Delete Relationship Permission*, click **Download**.
   1. Review the information, then click **Install**.

## Installation (CLI, Zip)

Sysadmins and developers may download the .zip file for this extension and install it with the command-line tool [cv](https://github.com/civicrm/cv).

`cd <extension-dir>`

`cv dl com.megaphonetech.deleterelationshipperm@https://github.com/MegaphoneJon/com.megaphonetech.deleterelationshipperm/archive/master.zip`

## Installation (CLI, Git)

This extension has not yet been published for installation via the web UI.

## Usage

Upon installation, your access control table will gain a new row where you can specify which user types are allowed to delete contact relationships. Find them by going to **Administer menu » Users and Permissions » Permissions (Access Control) » Wordpress Access Control** [note: Drupal users will have a slightly different path].

![delete-relationships_edited.png screenshot](/images/delete-relationships_edited.png)
