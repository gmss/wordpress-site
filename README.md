# To clone the repo without hi-res photos...

```
mkdir gmss
cd gmss
git init
git remote add github ...
```

...then set up as below and pull.

# To remove hi-res photos from a clone...
```
git branch -r -d github/master
vi .git/config
```
and change the line
```
	fetch = +refs/heads/*:refs/remotes/github/*
```
to
```
	fetch = +refs/heads/light:refs/remotes/github/light
```