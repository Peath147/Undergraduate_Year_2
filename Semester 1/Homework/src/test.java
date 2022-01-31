import java.io.*;

public class test
{

    // Function for calculating Magic square
    static void doublyEven(int n)
    {
        int[][] arr = new int[n][n];
        int i, j;

        // filling matrix with its count value
        // starting from 1;
        for ( i = 0; i < n; i++)
            for ( j = 0; j < n; j++)
                arr[i][j] = (n*i) + j + 1;

        // change value of Array elements
        // at fix location as per rule
        // (n*n+1)-arr[i][j]
        // Top Left corner of Matrix
        // (order (n/4)*(n/4))
        for ( i = 0; i < n/4; i++)
            for ( j = 0; j < n/4; j++)
                arr[i][j] = (n*n + 1) - arr[i][j];

        // Top Right corner of Matrix
        // (order (n/4)*(n/4))
        for ( i = 0; i < n/4; i++)
            for ( j = 3 * (n/4); j < n; j++)
                arr[i][j] = (n*n + 1) - arr[i][j];

        // Bottom Left corner of Matrix
        // (order (n/4)*(n/4))
        for ( i = 3 * n/4; i < n; i++)
            for ( j = 0; j < n/4; j++)
                arr[i][j] = (n*n+1) - arr[i][j];

        // Bottom Right corner of Matrix
        // (order (n/4)*(n/4))
        for ( i = 3 * n/4; i < n; i++)
            for ( j = 3 * n/4; j < n; j++)
                arr[i][j] = (n*n + 1) - arr[i][j];

        // Centre of Matrix (order (n/2)*(n/2))
        for ( i = n/4; i < 3 * n/4; i++)
            for ( j = n/4; j < 3 * n/4; j++)
                arr[i][j] = (n*n + 1) - arr[i][j];

        // Printing the magic-square
        for (i = 0; i < n; i++)
        {
            for ( j = 0; j < n; j++)
                System.out.print(arr[i][j]+" ");
            System.out.println();
        }
    }

    // driver program
    public static void main (String[] args)
    {
        int n = 4;
        // Function call
        doublyEven(n);
    }
}
