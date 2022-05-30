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

# 如果各个分支和master内容不一致，且本地的各个分支代码已经不同，如果要上传远程分支，则需要单独push，例如：
如果当前所在分支是devolpment
git push origin devolpment
否则，需要push 别的分支，就需要指定分支名称去push
git push origin dev:dev


