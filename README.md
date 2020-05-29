# Package skeleton

Repository to bootstrap package / library creation.

## "Installation"

1. Clone the repository: `git clone git@gitlab.com:apploud/package-skeleton.git`
2. Remove git remote: `git remote rm origin`
3. Edit `composer.json` file:
    1. Add **name** and **description**
    2. Change **authors**
    3. Change **namespaces** in _autoload_ and _autoload-dev_ sections
4. Edit `coding-standard.xml` file:
    1. Change **namespaces** at the bottom of the file
5. Edit (this) `README.md` file


## Creating the package repository

1. Create the repository on GitLab via https://config.apploud.cz
2. Add git remote: `git remote add origin git@gitlab.com:apploud/package-repository.git` (Change the git URL for the created repository)
3. Push all branches: `git push --all`

## Testing

Tests are run by `vendor/bin/phing` command. At least one PHP file in `src` directory is needed for tests to succeed.
