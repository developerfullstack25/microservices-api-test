<?php

declare(strict_types=1);

/*
 * This file is part of Class Preloader.
 *
 * (c) Graham Campbell <hello@gjcampbell.co.uk>
 * (c) Michael Dowling <mtdowling@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ClassPreloader\Parser;

use PhpParser\NodeTraverser as BaseTraverser;

/**
 * This is the file node visitor class.
 *
 * This allows a filename to be set when visiting.
 */
class NodeTraverser extends BaseTraverser
{
    /**
     * Transverse the file.
     *
     * @param \PhpParser\Node\Stmt[] $nodes
     * @param string                 $filename
     *
     * @return \PhpParser\Node[]
     */
    public function traverseFile(array $nodes, string $filename)
    {
        // Set the correct state on each visitor
        foreach ($this->visitors as $visitor) {
            if ($visitor instanceof AbstractNodeVisitor) {
                $visitor->setFilename($filename);
            }
        }

        return $this->traverse($nodes);
    }
}
