# demo
# 对于github上的新仓库, 得先用git push -u origin master这种方式指定上游并提交一次后, 才能使用git branch --set-upstream-to=origin/master master

# 删除远程分支
1切换到要操作的文件中 
    git branch 查看当前本地分
    git checkout -b [分支名]//新建分支并切换到新建分支
    注意：此时不可处在要删除的分支上，否则会报错，注意检查
2删除本地分支 
    git branch -d [本地分支名]
3删除远程分支
    git checkout -b [分支名]//新建分支并切换到新建分支


# 远程分支没有dev分支，需要先创建dev分支 
git checkout -b dev 新建一个分支，并切换到该分支
创建本地分支并推送git
git push -u origin dev
建立远程分支和本地分支之间的追踪关系
git branch --set-upstream-to=origin/dev dev 
然后提交暂存区
git add
然后提交本地仓库
git commit -m 'test dev'
推送远程仓库
git push


# 获取dev分支的代码(远程有分支)
切换到dev分支，
git checkout dev
git pull

如果没有，需要新建git dev分支并建立远程链接，再切换到dev分支
git checkout -b dev
git branch -a
git branch --set-upstream-to=origin/dev dev
git pull


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


# 合并分支 将devolpment 合并到dev上 




