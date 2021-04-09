
const consec = (array)=>{
    return Math.max.apply(Math, array.join('').split('0')).toString().length;
    
}

const one = [0,0,1,1,0,0,0,1,0,0,1,1,1,0];
 console.log(consec(one));



