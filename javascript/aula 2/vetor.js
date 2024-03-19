nomes = new Array('teste', 'teste1')
numeros = [1,2,3,4,5,6,7]
const vezes2 = e => e * 2

console.log(nomes, nomes[0], nomes[3])

numeros[8] = 9
numeros.push(10)
console.log(numeros);

numerosComTraco = numeros.join("-")
console.log(numerosComTraco);

numerosSemTraco = numeros.join()
console.log(numerosSemTraco);

numerosAoContrario = numeros.reverse()
console.log(numerosAoContrario);

numerosOrdenados = numerosAoContrario.sort()
console.log(numerosOrdenados);

tamanho = numeros.length
console.log(tamanho);

console.log(numeros.map(vezes2));

