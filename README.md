# To clone the repo without hi-res photos...

```bash
mkdir gmss
cd gmss
git init
git remote add github git@github.com:gmss/wordpress-site.git
git pull github light
```

...then configure `fetch` as below.

# To remove hi-res photos from a clone...
```bash
git branch -r -d github/master
```
...then configure `fetch` as below.

# To configure `fetch` type
```bash
vi .git/config
```
and change the line
```bash
	fetch = +refs/heads/*:refs/remotes/github/*
```
to
```
	fetch = +refs/heads/light:refs/remotes/github/light
```
