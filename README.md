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




