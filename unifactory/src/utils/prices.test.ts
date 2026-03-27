import { JSBI, Pair, Route, Token, TokenAmount, Trade, TradeType } from 'sdk'
import { BaseCurrency } from 'sdk/entities/currency'
import { computeTradePriceBreakdown } from './prices'
import appConfig from '../appConfig'

describe('prices', () => {
  const CHAIN_ID = 1 // mainnet
  const TEST_FACTORY = '0x5C69bEe701ef814a2B6a3EDD4B1652CB9cc5aA6f'
  const TEST_PAIR_HASH = '0x96e8ac4277198ff8b6f785478aa9a39f403cb768dd02cbee326c3e7da348845f'
  const TOTAL_FEE = 3 // 0.3%

  const baseCurrency = new BaseCurrency(CHAIN_ID)
  const token1 = new Token(CHAIN_ID, '0x0000000000000000000000000000000000000001', 18)
  const token2 = new Token(CHAIN_ID, '0x0000000000000000000000000000000000000002', 18)
  const token3 = new Token(CHAIN_ID, '0x0000000000000000000000000000000000000003', 18)
  // wrappedToken is used as the native token wrapper (WETH-equivalent); token1 fills this role in tests
  const wrappedToken = token1

  const pair12 = new Pair(
    new TokenAmount(token1, JSBI.BigInt(10000)),
    new TokenAmount(token2, JSBI.BigInt(20000)),
    TEST_FACTORY,
    TEST_PAIR_HASH
  )
  const pair23 = new Pair(
    new TokenAmount(token2, JSBI.BigInt(20000)),
    new TokenAmount(token3, JSBI.BigInt(30000)),
    TEST_FACTORY,
    TEST_PAIR_HASH
  )

  const route12 = new Route({ pairs: [pair12], input: token1, baseCurrency, wrappedToken })
  const route123 = new Route({ pairs: [pair12, pair23], input: token1, baseCurrency, wrappedToken })

  describe('computeTradePriceBreakdown', () => {
    it('returns undefined for undefined', () => {
      expect(computeTradePriceBreakdown(null, undefined, undefined)).toEqual({
        priceImpactWithoutFee: undefined,
        realizedLPFee: undefined,
      })
    })

    it('correct realized lp fee for single hop', () => {
      expect(
        computeTradePriceBreakdown(
          baseCurrency,
          new Trade({
            route: route12,
            amount: new TokenAmount(token1, JSBI.BigInt(1000)),
            tradeType: TradeType.EXACT_INPUT,
            wrappedToken,
            factory: TEST_FACTORY,
            pairHash: TEST_PAIR_HASH,
            totalFee: TOTAL_FEE,
            baseCurrency,
          }),
          TOTAL_FEE
        ).realizedLPFee
      ).toEqual(new TokenAmount(token1, JSBI.BigInt(3)))
    })

    it('correct realized lp fee for double hop', () => {
      expect(
        computeTradePriceBreakdown(
          baseCurrency,
          new Trade({
            route: route123,
            amount: new TokenAmount(token1, JSBI.BigInt(1000)),
            tradeType: TradeType.EXACT_INPUT,
            wrappedToken,
            factory: TEST_FACTORY,
            pairHash: TEST_PAIR_HASH,
            totalFee: TOTAL_FEE,
            baseCurrency,
          }),
          TOTAL_FEE
        ).realizedLPFee
      ).toEqual(new TokenAmount(token1, JSBI.BigInt(5)))
    })
  })
})
