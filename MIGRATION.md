# Yii2 Migration 使用指南

## 本地开发环境

### 执行 Migration

```bash
# 在容器中执行
docker compose exec php php yii migrate

# 或者直接在宿主机（如果安装了 PHP）
php yii migrate
```

### 常用命令

```bash
# 查看所有可用命令
docker compose exec php php yii

# 查看 migration 历史
docker compose exec php php yii migrate/history

# 查看未执行的 migration
docker compose exec php php yii migrate/new

# 回滚上一个 migration
docker compose exec php php yii migrate/down

# 创建新的 migration
docker compose exec php php yii migrate/create create_xxx_table
```

## 生产环境（Coolify）

部署到 Coolify 后，在应用容器终端执行：

```bash
php yii migrate --interactive=0
```

## Migration 文件说明

当前 migration：
- `m260126_022717_create_student_table.php` - 创建 student 表并插入 20 条测试数据

### Migration 结构

```php
public function safeUp()
{
    // 创建表
    $this->createTable('{{%student}}', [...]);
    
    // 插入数据
    $this->batchInsert('{{%student}}', [...]);
}

public function safeDown()
{
    // 回滚：删除表
    $this->dropTable('{{%student}}');
}
```

## 自定义 Migration

```bash
# 创建新的 migration
docker compose exec php php yii migrate/create add_column_to_student

# 编辑生成的文件
# migrations/m******_add_column_to_student.php

# 执行 migration
docker compose exec php php yii migrate
```

## 注意事项

1. **生产环境**：总是先备份数据库
2. **回滚操作**：确保 `safeDown()` 方法正确实现
3. **测试数据**：生产环境可能不需要插入测试数据
4. **权限问题**：确保容器对 `migrations/` 目录有写权限
