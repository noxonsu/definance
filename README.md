Обновление vendor

1. Клонируем в отдельную папку https://github.com/noxonsu/unifactory
```
git clone https://github.com/noxonsu/unifactory
```
2. Переключаем версию ноды и устанавливаем зависимости 
```
cd unifactory
nvm use
npm i --legacy-peer-deps
```
3. Делаем чистый билд
```
npm run build_clean
```

4. Удалить содержимое папки
```
definance\vendor_source
```
5. Скопировать свежий билд из ```unifactory\build``` в ```definance\vendor_source```
6. Увеличить версию в файле ```definance\definance.php```

```https://github.com/noxonsu/definance/blob/master/definance.php#L9```
```https://github.com/noxonsu/definance/blob/master/definance.php#L16```
