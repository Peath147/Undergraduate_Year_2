graph = {
    '1':['2','3'],   #                                      1
    '2':['4','5'],   #                      2                               3
    '3':['6','7'],   #              4               5               6               7
    '4':['8','9'],   #          8       9       10      11      12      13      14      15   
    '5':['10','11'], 
    '6':['12','13'],         
    '7':['14','15'], 
    '8':[],          
    '9':[],          
    '10':[],         
    '11':[],         
    '12':[],         
    '13':[],
    '14':[],
    '15':[]
}

def BFS(graph,start,dest) -> list(): 

    queue = list()
    visited = list()
    queue.append(start)
    result = ["Not reachable",list()]
    while queue:
        node = queue.pop(0)
        visited.append(node)
        if node==dest:
            result[0] = 'Reachable'
            break

        for child in graph[node]:
            if child not in visited:
                queue.append(child)
    result[1] = visited 
    return result

result = BFS(graph, "1", "10")

print("Path used to traverse :-" , result[1])