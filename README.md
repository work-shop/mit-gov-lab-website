# MIT GOV/LAB Website

## Local Directory Name

Every `docker` project should be in a uniquely named directory in your filesystem. Due to a quirk in `docker`, the name of the directory *must* be unique among directories with `docker` projects in them, or you'll get weird database crosstalk with the project whose directory has the same name. I recommend naming the directory for the project something like `{{ project name }}-{{ website type }}`.

*Directory Name:* `mit-gov-lab-website`



## Environment

Each project needs its own unique environment file, `.env`, which specifies some data that's unique to the project. This is used to set up the docker file and to provide authentication variables for the `./.deploy.sh` script, which deploys your development to the specified remote server. When starting a project, you need to either obtain or set up this `.env` file. A incomplete template, `.env` is included with this repository. It looks like this:

```sh

VOLUME_BASE_PATH=.

MYSQL_ROOT_PASSWORD=docker
MYSQL_DATABASE=wordpress
MYSQL_USER=docker
MYSQL_PASSWORD=docker

WORDPRESS_DB_HOST=database
WORDPRESS_DB_NAME=wordpress
WORDPRESS_DB_USER=docker
WORDPRESS_DB_PASSWORD=docker

DOCKER_WORDPRESS_CONTAINER={{site_name}}}_wordpress_1
DOCKER_DATABASE_CONTAINER={{site_name}}}_database_1


# Get Environment Details from Kinsta Dashboard SSH Connection Settings

# Staging Site URL, including http or https
STAGING_SITE_URL={{}}

# Production Site URL, including http or https
PRODUCTION_SITE_URL={{}}

# IP of Kinsta Staging Environment
KINSTA_STAGING_IP={{}}}

# Port of Kinsta SSH daemon process to staging environment
KINSTA_STAGING_PORT={{}}}

# User for Kinsta
KINSTA_STAGING_USER={{}}}

# IP of Kinsta Production Environment
KINSTA_PRODUCTION_IP={{}}}

# Port of Kinsta SSH daemon process to production environment
KINSTA_PRODUCTION_PORT={{}}}

# User for Kinsta
KINSTA_PRODUCTION_USER={{}}}

# ACF Pro Key
ACF_PRO_KEY=b3JkZXJfaWQ9OTMwMTV8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE2LTExLTA0IDEzOjEwOjI0

```

To complete the file, fill in the `DOCKER_DATABASE_CONTAINER` and `DOCKER_WORDPRESS_CONTAINER`. If you're planning to deploy this codebase at any point, fill in the details for your remote location, otherwise delete the variable names. 


## DevOps Assumptions

We're replacing our previous Webpack + BrowserSync development or Gulp development setup with Grunt for this project. 


## Plugin Dependencies: Wordpress



## Setting up the Development Environment.

1. Install [Docker](https://docs.docker.com/engine/installation/). Make sure that the docker installation you're selecting contains `docker-machine` and `docker-compose` as well as the simple `docker` command. Follow the installation prompts.

2. Clone this repository locally to a directory in your workspace. The specific location of the directory is not significant.

3. From inside the cloned drectory, Run `npm install` to get the dependencies for this project. When that's done, run `npm run build` to test your installation. If you don't get any errors from the build process, and you see a folder named 'bundles' in the 'themes/custom' folder, with files named 'admin-bundle.css', 'bundle.css' and 'bundle.js', the process worked.

4. Configure the `.env`, filling in the missing fields with the target Kinsta instance for this project (if relevant, otherwise delete the field), and the `ACF_PRO_KEY` field.

5. Next, we need to enable Public Key access to the staging environment for you. You can do this using the `ssh-copy-id` command line tool, along with the typical public key you use for Digital Ocean, for example. Typically, your public key will be in `~/.ssh/id_rsa.pub`, so you would run `ssh-copy-id -i ~/.ssh/id_rsa.pub {{user:ip.of.destination}}`. The password for this specific instance (which you'll need to copy your `id_rsa.pub` file over) can be found in the Kinsta management console.

6. run `docker-compose up -d` to provision a new virtual environment and database running wordpress.

7. run `npm run watch` to start the development environment. The docker container will watch for changes as you make them, and reload the page at `http://localhost:8080`.

8. When you're done working, run `docker-compose down` to safely close the development environment.


## Starting Work

1. You only need to do the above steps once. To start working locally, run `docker-compose up -d` to start your containers, and `npm run watch` to start webpack. When you're done working, kill `npm run watch` with `^C`, and run `docker-compose down` to bring down your containers.

2. To deploy your work to the staging site, run `npm run deploy` from the root directory. This command will place whatever's in your compiled `dist` directory into the appropriate locations on the server.


## Resources

- Information on Wordpress Gutenburg, and making sure to future-proof for it is available [here](https://deliciousbrains.com/wordpress-gutenberg/). The Gutenberg plugin (which is being merged into Core in release 5.0.0) is installed for prototyping.
