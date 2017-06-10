import pandas as pd

colNames = ['time', 'peakMemory']

arrayData = pd.read_csv('run_array.log', names=colNames, delimiter='\t')
transducersData = pd.read_csv('run_transducers.log', names=colNames, delimiter='\t')

print(arrayData.describe())
print(transducersData.describe())
