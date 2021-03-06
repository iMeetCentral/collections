<?php
namespace iMeetCentral\Collection;

use iter;

/**
 * Default implementation of AbstractSeq.
 * Can only be iterated over once since the underlying implementation uses generators.
 *
 * @package iMeetCentral
 */
class NonRewindableSeq extends AbstractSeq {

    /**
     * @param callable $fn
     * @return NonRewindableSeq
     */
    public
    function map(callable $fn) {
        return new static(iter\map($fn, $this->value));
    }

    /**
     * @param callable $fn
     * @return NonRewindableSeq
     */
    public
    function map_keys(callable $fn) {
        return new static(iter\mapKeys($fn, $this->value));
    }

    /**
     * @param callable $fn
     * @return NonRewindableSeq
     */
    public
    function reindex(callable $fn) {
        return new static(iter\reindex($fn, $this->value));
    }

    /**
     * @param callable $fn
     * @return NonRewindableSeq
     */
    public
    function filter(callable $fn) {
        return new static(iter\filter($fn, $this->value));
    }

    /**
     * @param callable $fn
     * @param null $start_value
     * @return NonRewindableSeq
     */
    public
    function reductions(callable $fn, $start_value = null) {
        return new static(iter\reductions($fn, $this->value, $start_value));
    }

    /**
     * @param array ...$iterables
     * @return NonRewindableSeq
     */
    public static
    function zip(...$iterables) {
        return new static(call_user_func_array('iter\zip', $iterables));
    }

    /**
     * @param $keys
     * @param $values
     * @return NonRewindableSeq
     */
    public static
    function zip_key_value($keys,  $values) {
        return new static(iter\zipKeyValue($keys, $values));
    }

    /**
     * @param array ...$iterables
     * @return NonRewindableSeq
     */
    public static
    function chain(...$iterables) {
        return new static(call_user_func_array('iter\chain', $iterables));
    }

    /**
     * @param array ...$iterables
     * @return NonRewindableSeq
     */
    public static
    function product(...$iterables) {
        return new static(call_user_func_array('iter\product', $iterables));
    }

    /**
     * @param int $start
     * @param int $length
     * @return NonRewindableSeq
     */
    public
    function slice(int $start, int $length = INF) {
        return new static(iter\slice($this->value, $start, $length));
    }

    /**
     * @param int $num
     * @return NonRewindableSeq
     */
    public
    function take(int $num) {
        return new static(iter\take($num, $this->value));
    }

    /**
     * @param int $num
     * @return NonRewindableSeq
     */
    public
    function drop(int $num) {
        return new static(iter\drop($num, $this->value));
    }

    /**
     * @param callable $fn
     * @return NonRewindableSeq
     */
    public
    function take_while(callable $fn) {
        return new static(iter\takeWhile($fn, $this->value));
    }

    /**
     * @param callable $fn
     * @return NonRewindableSeq
     */
    public
    function drop_while(callable $fn) {
        return new static(iter\dropWhile($fn, $this->value));
    }

    /**
     * @return NonRewindableSeq
     */
    public
    function keys() {
        return new static(iter\keys($this->value));
    }

    /**
     * @return NonRewindableSeq
     */
    public
    function values() {
        return new static(iter\values($this->value));
    }

    /**
     * @return NonRewindableSeq
     */
    public
    function flatten() {
        return new static(iter\flatten($this->value));
    }

    /**
     * @return NonRewindableSeq
     */
    public
    function flip() {
        return new static(iter\flip($this->value));
    }

    /**
     * @param int $size
     * @return NonRewindableSeq
     */
    public
    function chunk(int $size) {
        return new static(iter\chunk($this->value, $size));
    }
}