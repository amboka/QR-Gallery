#include <stdio.h>
#include <stdlib.h>
#include <ctype.h>
#include <sys/mman.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <unistd.h>
#include <string.h>

// This function counts lines, words, and bytes in a file using memory mapping
void count_file(const char *filename, long *line_count, long *word_count, long *byte_count) {
    int file = open(filename, O_RDONLY);  // Open the file in read-only mode
    if (file == -1) {  // Check if file failed to open
        perror("Could not open file");
        return;
    }

    // Get file size
    struct stat file_stat;
    if (fstat(file, &file_stat) == -1) {  // Get file statistics
        perror("Could not get file stats");
        close(file);
        return;
    }
    *byte_count = file_stat.st_size;  // Set byte count to the file size

    // If file is empty, just return with 0 counts
    if (*byte_count == 0) {
        close(file);
        return;
    }

    // Memory map the file
    char *data = mmap(NULL, file_stat.st_size, PROT_READ, MAP_PRIVATE, file, 0);
    if (data == MAP_FAILED) {
        perror("Could not map file");
        close(file);
        return;
    }

    // Count lines, words, and bytes
    int inside_word = 0;
    for (long i = 0; i < file_stat.st_size; i++) {
        (*byte_count)++;  // Increment byte count

        if (data[i] == '\n') {  // Check if character is a newline
            (*line_count)++;  // Increment line count
        }

        if (isspace((unsigned char)data[i])) {  // Check if character is whitespace
            if (inside_word) {  // End of a word
                (*word_count)++;
                inside_word = 0;  // Reset word flag
            }
        } else {
            inside_word = 1;  // We are inside a word
        }
    }
    if (inside_word) {  // Count the last word if the file ends without whitespace
        (*word_count)++;
    }

    // Clean up
    munmap(data, file_stat.st_size);
    close(file);
}

// This function counts lines, words, and bytes from standard input (stdin)
void count_stdin(long *line_count, long *word_count, long *byte_count) {
    int inside_word = 0;
    int ch;

    while ((ch = getchar()) != EOF) {  // Read until end of input
        (*byte_count)++;  // Increment byte count

        if (ch == '\n') {  // Check if character is newline
            (*line_count)++;
        }

        if (isspace((unsigned char)ch)) {  // Check if character is whitespace
            if (inside_word) {  // End of a word
                (*word_count)++;
                inside_word = 0;  // Reset word flag
            }
        } else {
            inside_word = 1;  // We are inside a word
        }
    }
    if (inside_word) {  // Count the last word if the input ends without whitespace
        (*word_count)++;
    }
}

int main(int argc, char *argv[]) {
    long total_lines = 0, total_words = 0, total_bytes = 0;  // Totals for multiple files

    if (argc == 1) {  // No files specified, read from stdin
        long lines = 0, words = 0, bytes = 0;
        count_stdin(&lines, &words, &bytes);
        printf("%ld %ld %ld\n", lines, words, bytes);
    } else {
        // Process each file given in command line arguments
        for (int i = 1; i < argc; i++) {
            long lines = 0, words = 0, bytes = 0;
            count_file(argv[i], &lines, &words, &bytes);
            printf("%ld %ld %ld %s\n", lines, words, bytes, argv[i]);
            total_lines += lines;
            total_words += words;
            total_bytes += bytes;
        }
        
        // Print total summary if more than one file
        if (argc > 2) {
            printf("%ld %ld %ld total\n", total_lines, total_words, total_bytes);
        }
    }

    return 0;
}
