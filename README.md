# yii2test

This repository is for testing Yii2 development and deploying to Coolify.

在windows， wsl下使用docker ， 如果在docker desktop 选择了 集成， wsl会默认自动启动的 这个注意下 

composer 安装库执行  

docker compose run --rm -u root php composer install

这个项目的仓库配置 ，优先使用华为云
  "repositories": [
    {
        "type": "composer",
        "url": "https://mirrors.huaweicloud.com/repository/php/",
        "canonical": false
    },
    {
        "type": "composer",
        "url": "https://asset-packagist.org"
    }
  ],


