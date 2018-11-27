$(function(e) {
    "use strict";

    var params = {
        translation: {
            '0': {pattern: /\d/},
            '1': {pattern: /[1-9]/},
            '9': {pattern: /\d/, optional: true},
            '#': {pattern: /\d/, recursive: true},
            'E': {pattern: /J|j|G|g/, fallback: 'J'},
            'P': {pattern: /V|v|E|e/, fallback: 'V'},
            //Mobile
            'V': {pattern: /[2]/, fallback: 2},
            'W': {pattern: /[1|3-9]/},
            //Line
            'Y': {pattern: /[4]/, fallback: 4},
            'X': {pattern: /[1|2]/},
            'Z': {pattern: /[2|4|6]/},
            //            

        }
    };
    $('.rif-mask').mask('E-00000000-0', params);
    $('.ci-mask').mask('P-19999999', params);
    $('.mask').mask('P-999999999', params);
    $('.movil-mask').mask('(YXZ) 000-0000', params);
    $('.fijo-mask').mask('(VW0) 000-0000', params);    



});
