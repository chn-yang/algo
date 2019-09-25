package main

import (
	"fmt"
)

func main() {
	// ran := make([]int, 10)
	// for i := 0; i < len(ran); i++ {
	// 	ran[i] = i
	// }
	// ran := []int{1, 3, 5, 6, 6, 33}
	// fmt.Println(bSearch(ran, 6))
	slice := make([]int, 0)
	explodeNum(12345, &slice)
	fmt.Println(slice)
}

func bSearch(slice []int, needle int) int {
	low, high := 0, len(slice)-1
	for low <= high {
		mid := low + (high-low)/2
		if slice[mid] == needle {
			return mid
		} else if slice[mid] < needle {
			low = mid + 1
		} else {
			high = mid - 1
		}
	}
	return -1
}

//	slice := make([]int, 0)
//	explodeNum(12345, &slice)
//	fmt.Println(slice)
func explodeNum(n int, slice *[]int) {
	if n > 10 {
		*slice = append(*slice, n%10)
		explodeNum(n/10, slice)
	}
	*slice = append(*slice, n%10)
}
