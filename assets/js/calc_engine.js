let calcCurrent = '0';
let calcHistory = '';
let calcMemory = 0;
let isScientific = false;

function switchCalcTab(tab) {
    if (tab === 'scientific') {
        document.getElementById('calc-scientific').style.display = 'block';
        document.getElementById('calc-normal').style.display = 'none';
        document.getElementById('tab-scientific').classList.add('active');
        document.getElementById('tab-normal').classList.remove('active');
        isScientific = true;
    } else {
        document.getElementById('calc-scientific').style.display = 'none';
        document.getElementById('calc-normal').style.display = 'block';
        document.getElementById('tab-scientific').classList.remove('active');
        document.getElementById('tab-normal').classList.add('active');
        isScientific = false;
    }
    updateDisplay();
}

function updateDisplay() {
    const mainDisp = isScientific ? document.getElementById('sci-disp-main') : document.getElementById('norm-disp-main');
    const histDisp = isScientific ? document.getElementById('sci-disp-hist') : document.getElementById('norm-disp-hist');
    
    if(mainDisp) mainDisp.innerText = calcCurrent;
    if(histDisp) histDisp.innerText = calcHistory;
}

function calcInput(val) {
    if (calcCurrent === '0' && val !== '.') {
        calcCurrent = val;
    } else {
        calcCurrent += val;
    }
    updateDisplay();
}

function calcOp(op) {
    if (op === 'C' || op === 'CE') {
        calcCurrent = '0';
        if (op === 'C') calcHistory = '';
    } else if (op === 'back') {
        if (calcCurrent.length > 1) {
            calcCurrent = calcCurrent.slice(0, -1);
        } else {
            calcCurrent = '0';
        }
    } else if (op === '+/-') {
        if (calcCurrent.startsWith('-')) {
            calcCurrent = calcCurrent.substring(1);
        } else if (calcCurrent !== '0') {
            calcCurrent = '-' + calcCurrent;
        }
    }
    updateDisplay();
}

function getAngleFactor() {
    const isDeg = document.getElementById('deg') && document.getElementById('deg').checked;
    return isDeg ? Math.PI / 180 : 1;
}

function calcFunc(funcName) {
    try {
        let val = eval(calcCurrent.replace(/pi/g, Math.PI).replace(/e/g, Math.E));
        let factor = getAngleFactor();
        let result = 0;

        switch(funcName) {
            case 'sin': result = Math.sin(val * factor); break;
            case 'cos': result = Math.cos(val * factor); break;
            case 'tan': result = Math.tan(val * factor); break;
            case 'asin': result = Math.asin(val) / factor; break;
            case 'acos': result = Math.acos(val) / factor; break;
            case 'atan': result = Math.atan(val) / factor; break;
            case 'sinh': result = Math.sinh(val); break;
            case 'cosh': result = Math.cosh(val); break;
            case 'tanh': result = Math.tanh(val); break;
            case 'asinh': result = Math.asinh(val); break;
            case 'acosh': result = Math.acosh(val); break;
            case 'atanh': result = Math.atanh(val); break;
            case 'log': result = Math.log10(val); break;
            case 'ln': result = Math.log(val); break;
            case 'log2': result = Math.log2(val); break;
            case 'exp': result = Math.exp(val); break;
            case 'sqrt': result = Math.sqrt(val); break;
            case 'cuberoot': result = Math.cbrt(val); break;
            case 'sqr': result = Math.pow(val, 2); break;
            case 'cube': result = Math.pow(val, 3); break;
            case 'inv': result = 1 / val; break;
            case 'abs': result = Math.abs(val); break;
            case 'exp_10': result = Math.pow(10, val); break;
            case 'exp_e': result = Math.exp(val); break;
            case 'fact': 
                let f = 1;
                for(let i=2; i<=Math.round(val); i++) f*=i;
                result = f;
                break;
            default: result = val;
        }
        
        calcHistory = funcName + '(' + calcCurrent + ')';
        calcCurrent = result.toString();
        
        // Handle floating point precision issues
        if(calcCurrent.length > 15) {
            calcCurrent = parseFloat(result.toPrecision(12)).toString();
        }
        
    } catch(e) {
        calcCurrent = "Error";
    }
    updateDisplay();
}

function calcMem(op) {
    let val = parseFloat(calcCurrent) || 0;
    switch(op) {
        case 'MC': calcMemory = 0; break;
        case 'MR': calcCurrent = calcMemory.toString(); break;
        case 'MS': calcMemory = val; break;
        case 'M+': calcMemory += val; break;
        case 'M-': calcMemory -= val; break;
    }
    updateDisplay();
}

function calcEval() {
    try {
        let expression = calcCurrent;
        
        // Replace constants
        expression = expression.replace(/pi/g, Math.PI);
        // We have to be careful replacing 'e' as it might be used in scientific notation (e.g. 1e-5), but user inputs 'e' explicitly from button.
        expression = expression.replace(/\be\b/g, Math.E);
        
        // Safely evaluate simple math using Function constructor instead of direct eval
        let result = new Function('return ' + expression)();
        
        calcHistory = calcCurrent + ' =';
        calcCurrent = result.toString();
        
        if(calcCurrent.length > 15) {
            calcCurrent = parseFloat(result.toPrecision(12)).toString();
        }
    } catch(e) {
        calcCurrent = "Error";
    }
    updateDisplay();
}

// Global scope bindings for the buttons
window.switchCalcTab = switchCalcTab;
window.calcInput = calcInput;
window.calcOp = calcOp;
window.calcFunc = calcFunc;
window.calcMem = calcMem;
window.calcEval = calcEval;
