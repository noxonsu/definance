import { TextDecoder, TextEncoder } from 'util'

// Polyfill TextEncoder/TextDecoder for jsdom (needed for viem/ethers and related packages)
;(global as any).TextEncoder = TextEncoder
;(global as any).TextDecoder = TextDecoder
