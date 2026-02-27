# DeFinance

[![Deploy Status](https://github.com/noxonsu/definance/actions/workflows/deploy.yml/badge.svg)](https://github.com/noxonsu/definance/actions/workflows/deploy.yml)

## Обновление vendor

1. Клонируем в отдельную папку https://github.com/noxonsu/unifactory
```
git clone https://github.com/noxonsu/unifactory
```
2. Переключаем версию ноды и устанавливаем зависимости 
```bash
cd unifactory
nvm use 16
npm i --legacy-peer-deps
```
3. Делаем чистый билд
```bash
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

## Wallet Apps Bridge (MCW iframe mode)

Для открытия DeFinance внутри MultiCurrencyWallet `#/apps` добавлен клиентский адаптер:

- `vendor_source/wallet-apps-bridge-client.js`
- подключение в `vendor_source/index.html` до загрузки `main.chunk.js`
- подключение в `templates/definance_main.php` (WordPress режим)

Адаптер активируется только если одновременно:
- приложение открыто в iframe (`window.parent !== window`)
- в URL есть `walletBridge=swaponline`

Поддержка origin allowlist:
- runtime: `window.SO_DefinanceBridgeConfig.allowedHostOrigins = ['https://wallet.example']`
- runtime override: `window.SO_WalletAppsAllowedOrigins = ['https://wallet.example']`
- query: `?walletBridge=swaponline&walletBridgeAllowedOrigins=https://wallet.example,https://wallet2.example`
- WordPress option: `definance_wallet_bridge_allowed_origins` (строка CSV), пробрасывается в `window.SO_Definance.walletBridgeAllowedOrigins`
