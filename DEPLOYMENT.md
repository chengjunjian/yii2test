# Yii2 环境配置说明

## 本地开发环境

使用 `docker-compose.yml` 中的默认配置：
```bash
docker compose up -d
```

数据库配置已通过环境变量设置。

## Coolify 生产环境配置

在 Coolify 中设置以下环境变量：

### 必需配置

```bash
# 数据库配置
DB_DSN=mysql:host=<your-db-host>;dbname=<your-db-name>
DB_USERNAME=<your-db-user>
DB_PASSWORD=<your-db-password>

# PHP 配置
PHP_OPCACHE_ENABLE=1
NGINX_WEBROOT=/var/www/html/web
SSL_MODE=off
```

### 可选配置

```bash
# 应用环境
YII_DEBUG=false
YII_ENV=prod
```

## 配置说明

- **开发环境**：使用 docker-compose.yml 中的默认值（mariadb 容器）
- **生产环境**：通过 Coolify 环境变量覆盖（真实数据库）
- **优先级**：环境变量 > 默认值

## 数据库初始化

部署到 Coolify 后，使用 Yii2 Migration 初始化数据库。

### 方式 1：使用 Migration（推荐）

在 Coolify 应用容器的终端中执行：

```bash
php yii migrate --interactive=0
```

这将：
- 创建 `student` 表
- 插入 20 条测试数据

### 方式 2：手动导入 SQL（备用）

如果 Migration 不可用，可以手动导入：

```bash
# 在 Coolify 的 MariaDB 容器终端
mariadb -u<user> -p<password> <database>
# 然后粘贴 yii2test.sql 的内容
```

### Migration 管理

```bash
# 查看 migration 状态
php yii migrate/history

# 回滚上一次 migration
php yii migrate/down

# 回滚所有 migration
php yii migrate/down all
```
