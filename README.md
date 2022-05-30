# demo
对于github上的新仓库, 得先用git push -u origin master这种方式指定上游并提交一次后, 才能使用git branch --set-upstream-to=origin/master master


# 远端推送的时候，报错 fatal: bad boolean config value '“false”' for 'http.sslverify'
git push -u origin devolpment 之后显示 报错信息
有效方式
git config --edit
里面编辑 ：
[http]
sslverify = false

之后 git push -u origin devolpment 就正常了
然后，建立本地和远程的分支
